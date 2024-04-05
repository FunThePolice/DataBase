
<h1>Main Page</h1>

<?php

use App\Helpers\Message;

if (isset($_SESSION['is_auth'])) {
    echo 'Hello'.$_SESSION['name'];
}
Message::flash();
?>

<div>
    <form action="/registration" method="post">
        <button type="submit" class="btn btn-primary">To registration</button>
    </form>
</div>
<div>
    <form action="/login" method="post">
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
</div>
<div>
    <form action="/profile" method="post">
        <button type="submit" class="btn btn-primary">Profile</button>
    </form>
</div>

