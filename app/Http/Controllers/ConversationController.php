<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConversationRequest;
use App\Http\Requests\SendConversationMessageRequest;
use App\Models\CompanyProfile;
use App\Models\Conversation;
use App\Models\DeveloperProfile;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class ConversationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.company.subscription')->only(['create', 'store']);
    }

    public function index()
    {
        $companyProfile = CompanyProfile::my()->first()?->only(['id', 'name']);
        $developerProfile = DeveloperProfile::my()->first()?->only(['id', 'full_name']);

        $companyConversations = Conversation::forSender()->with(['receiver.developerProfile'])
            ->get()
            ->transform(fn($c) => [
                'id' => $c->id,
                'developerProfile' => $c->receiver->developerProfile?->only('id', 'full_name', 'created_at_formatted'),
            ]);

        $developerConversations = Conversation::forReceiver()->with(['sender.companyProfile'])
            ->get()
            ->transform(fn($c) => [
                'id' => $c->id,
                'companyProfile' => $c->sender->companyProfile?->only('id', 'name', 'created_at_formatted')
            ]);

        return inertia(
            'Conversation/Index',
            compact(
                'companyConversations',
                'developerConversations',
                'companyProfile',
                'developerProfile'
            )
        );
    }

    public function create()
    {
        $developerProfile = DeveloperProfile::select(['id', 'full_name', 'user_id'])->findOrFail(request('developer_id'));

        if (Conversation::isDuplicate() || $developerProfile->user_id === auth()->id()) {
            return redirect()->route('conversations.index');
        }

        return inertia('Conversation/Create', compact('developerProfile'));
    }

    public function store(ConversationRequest $request)
    {
        if (Conversation::isDuplicate()) {
            return redirect()->route('conversations.index');
        }

        $conversation = DB::transaction(function () use ($request) {
            $conversation = Conversation::create([
                'receiver_id' => $request->receiver_id,
                'sender_id' => auth()->id()
            ]);

            $conversation->messages()->create(
                $request->only('body') + ['sender_id' => auth()->id()]
            );

            return $conversation;
        });

        return redirect()->route('conversations.show', $conversation->id);
    }

    public function show(int $id)
    {
        $conversation = Conversation::forUser()
            ->with(['receiver.developerProfile', 'sender.companyProfile'])
            ->findOrFail($id);

        $profile = $conversation->getCompanionProfile();

        $messages = Message::whereConversationId($id)->get();

        Message::markAsReadForSender(auth()->id());

        return inertia(
            'Conversation/Show',
            compact('id', 'messages', 'profile')
        );
    }

    public function sendMessage(SendConversationMessageRequest $request)
    {
        Message::create($request->validated() + [
                'sender_id' => auth()->id()
            ]);
    }
}
