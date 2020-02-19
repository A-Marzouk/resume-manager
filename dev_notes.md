* We may create an agent with at least this information. A client will be returned.
app(User::class)->createAgent([
    'user' => [
        'email' => 'user@example.org',
        'password' => '123456789',
        'username' => 'user@example.org',
    ],
    'agent' => [],
]);

* We may create an client with at least this information. A client will be returned.
app(User::class)->createClient([
    'user' => [
        'email' => 'client@example.org',
        'password' => '123456789',
        'username' => 'client@example.org',
    ],
    'client' => [],
]);
