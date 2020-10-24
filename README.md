# payment-api

- Install XAMPP / Web Server
- Install MySQL (jika menggunakan XAMPP tidak perlu install lagi)
- Copy / Clone Project Ini ke Path htdocs (jika menggunakan XAMPP)
- Sesuaikan config database anda pada file 'db/database.php';

Migration :
- Bukan cmd / command prompt
- Masuk ke directory 'db' pada project ini
- Ketik perintah 'php migrate.php'


API Create Transaction
Method : GET
Parameter Request :
- invoice_id
- item_name
- amount
- payment_type (virtual_account, credit_card)
- customer_name
- merchant_id

Sample url : http://localhost/wildan/payment-api/api/payment/create?invoice_id=1234567890&item_name=test&amount=100&payment_type=virtual_account&customer_name=will&merchant_id=12345678

Sesuaikan Pathnya dengan Path URL anda

API Check Transaction
Method : GET
Parameter Request :
- references_id
- merchant_id

Sample url : http://localhost/wildan/payment-api/api/payment/check?references_id=87654321&merchant_id=12345678

Sesuaikan dengan path URL anda

Update Status Transaction
- Buka cmd / Command Prompt
- Masuk ke directory 'cli'
- Kemudian ketik perintah php transaction-cli {references_id} {status}
- Sesuaikan references_id dan status yang ingin anda update ('Pending', 'Paid', 'Failed')
  
  