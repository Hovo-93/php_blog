<?= $welcome ?>
<?= $user ?>
<form action="/login" method="post">
    <input type="email"  name="email">
    <input type="password" name="password">
    <input type="submit" value="Sign in">
</form>
