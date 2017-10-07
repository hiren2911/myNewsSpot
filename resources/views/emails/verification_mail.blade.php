Hello {{ $user->name }},

<p>Thanks for Registering on My News Spot. </p>
<p>Please Click on below link to verify your email address and set password for your account.</p>

{{ url('/verifyemail/'.$user->verification_token) }}

<br/><br/>


Regards,<br/>
My News Spot Support