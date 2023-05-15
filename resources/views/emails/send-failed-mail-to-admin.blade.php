<x-mail::message>
# Sending mail to the following user failed

Mail Subject: <b>{{ $failed_report['mail_subject'] }}</b> <br>
User Firstname: <b>{{ $failed_report['mail_user_firstname'] }}</b> <br>
User Lastname: <b>{{ $failed_report['mail_user_lastname'] }}</b> <br>
User E-Mail: <b>{{ $failed_report['mail_user_email'] }}</b> <br>

If you receive this E-Mail, please contact the dev: "danickdaloya8@gmail.com"
</x-mail::message>
