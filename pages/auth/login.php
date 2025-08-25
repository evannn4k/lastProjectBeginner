<form action="<?= action("/auth/login") ?>" method="POST">
    <table>
        <tr>
            <td><label for="email">Masukan username</label></td>
            <td>
                <input type="email" name="email" id="email">
            </td>
        <tr>
        <tr>
            <td><label for="password">Masukan password</label></td>
            <td>
                <input type="text" name="password" id="password">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Login</button>
            </td>
        </tr>
    </table>
</form>