<?php
require_once('includes/header.php');
$user = getProfileInfo($_SESSION['userinfo']['username']);
?>
<section class="panel">
    <header>
        <h2>Personal information</h2>
    </header>
    <div id="personal-info">
        <p>Username: <span><?= $user->getUserName() ?></span></p>
        <p>First name: <span><?= $user->getFirstName() ?></span></p>
        <p>Last name: <span><?= $user->getLastName() ?></span></p>
        <a href="#" id="edit">Edit</a>
    </div>
</section>
<script src="scripts/profileEditor.js"></script>
<script>
    setNames(<?= json_encode($user->getFirstName()) ?>,<?= json_encode($user->getLastName()) ?>);
</script>
<?php
if (isset($_POST['first-name']) || isset($_POST['last-name']) || isset($_POST['old-pass']) && isset($_POST['new-pass']) && isset($_POST['new-repass'])) {

    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $oldPass = $_POST['old-pass'];
    $newPass = $_POST['new-pass'];
    $newRePass = $_POST['new-pass'];
    $realPass = $user->getPassword();

    $validReq = checkRequest($firstName, $lastName, $oldPass, $newPass, $newRePass, $realPass, $user->getUserName());

    if ($validReq) {
        header("Location: profile.php");
    }
}
?>
<?php require_once('includes/footer.php'); ?>