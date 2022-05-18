## User Model

Add the `CanConfirm` trait and `Confirmable` interface to your User model.

```php
use Bavix\Wallet\Interfaces\Confirmable;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\CanConfirm;
use Bavix\Wallet\Traits\HasWallet;

class UserConfirm extends Model implements Wallet, Confirmable
{
    use HasWallet, CanConfirm;
}
```

> You can only confirm the transaction with the wallet you paid with.

### Example:

Sometimes you need to create an operation and confirm its field. 
That is what this trey does.

```php
$user->balance; // 0
$transaction = $user->deposit(100, null, false); // not confirm
$transaction->confirmed; // bool(false)
$user->balance; // 0

$user->confirm($transaction); // bool(true)
$transaction->confirmed; // bool(true)

$user->balance; // 100 
```

It worked! 
