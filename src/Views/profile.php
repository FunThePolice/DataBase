<?php

use App\Helpers\CheckBox;

session_start();
CheckBox::AuthCheck();
?>
<h1>Profile</h1>
<h1>You are logged in</h1>
<div>
    <form action="/" method="post">
        <button type="submit" class="btn btn-primary">Back</button>
    </form>
</div>
<div>
    <form action="/signOut" method="post">
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</div>