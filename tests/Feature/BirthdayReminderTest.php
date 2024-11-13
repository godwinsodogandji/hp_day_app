<?php
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Birthdays;
use App\Mail\BirthdayReminderMail;
use Tests\TestCase;

class BirthdayReminderTest extends TestCase
{
    /** @test */
    public function it_sends_birthday_reminder_email()
    {
        // Créer un utilisateur et un anniversaire
        $user = User::factory()->create([
            'email' => 'john@example.com',
        ]);

        $birthday = Birthdays::create([
            'user_id' => $user->id,
            'date' => now()->addDay(), // Demain
            'notification_sent' => false,
        ]);

        // Fake l'envoi des mails pour éviter l'envoi réel
        Mail::fake();

        // Appeler la méthode pour envoyer le rappel d'anniversaire
        $birthdayController = new \App\Http\Controllers\BirthdayController();
        $birthdayController->sendBirthdayReminder($user, $birthday);

        // Vérifier que l'e-mail a bien été envoyé
        Mail::assertSent(BirthdayReminderMail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email); // Vérifie que l'e-mail a bien été envoyé à l'adresse de l'utilisateur
        });

        // Vérifier que la notification a été marquée comme envoyée
        $this->assertTrue($birthday->fresh()->notification_sent);
    }
}
