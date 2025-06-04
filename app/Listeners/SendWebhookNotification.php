<?php

namespace App\Listeners;

use App\Events\ContactRequestSaved;
use App\Models\ContactRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class SendWebhookNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactRequestSaved $event): void
    {
        $webhookUrl = config('app.discord_webhook_url');

        $payload = [
            "content" => null,
            "embeds" => [
                [
                    "title" => "New contact request",
                    "color" => 5832543,
                    "fields" => [
                        [
                            "name" => "Name",
                            "value" => $event->contact->name
                        ],
                        [
                            "name" => "Email",
                            "value" => $event->contact->email
                        ],
                        [
                            "name" => "Phone",
                            "value" => $event->contact->phone
                        ],
                        [
                            "name" => "Message",
                            "value" => $event->contact->message
                        ]
                    ]
                ]
            ],
            "username" => "Portfolio Request Contact",
            "attachments" => []
        ];

        Http::post($webhookUrl, $payload);
    }
}
