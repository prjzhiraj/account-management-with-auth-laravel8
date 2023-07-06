<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

create database laravel_knabus<br><br>

.env file with credentials and setup provided inside of file in this repo.<br>
make sure the .env is setup correctly, check the credentials and database name in .env if matched to your local server (recommended XAMPP)

<b>On your Terminal/Git Bash:</b><br>
1.composer install<br>
2.php artisan migrate:fresh --seed<br>
3.php artisan serve<br>
<br><br>
credentials:<br>
email: customer1@email.com, customer2@email.com<br>
password: 12345678<br>

<img style="width: 100%;" src="/public/img/login_page.JPG"><br><br>

<h2>Log in Page</h2>
<ol>
  <li>Use the email and password provided above.</li>
  <li>Click <b>Login</b> or Hit Enter to login.</li>
</ol> 
<br><br>
<img style="width: 100%;" src="/public/img/book_now_page.JPG"><br><br>
<h2>Book Now Tab</h2>
<ol>
  <li>To Book your schedule, at the left side(Calendar) select the day, and time block.</li>
  <li>at the right side(Table) choose your Therapist and hit <b>Book Now</b> button</li>
</ol> 
<br><br>
<img style="width: 100%;" src="/public/img/my_booking_page.JPG"><br><br>
<h2>My Booking Tab</h2>
<ol>
  <li>To Cancel your booking, simply press <b>Cancel Booking</b> button</li>
</ol> 
<br><br>
