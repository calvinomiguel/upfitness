# WEB APPLICATION UP FITNESS

## Purpose
Up Fitness is a web application designed to help users get fitter and healthier.
With Up Fitness users get curated recipes for healthy nutrition and fitness exercises, they
can practice at home.

## How it works & functionality
1. The application is built very simply. To sign-up you have to enter your size, weight, age etc. Finally you have to enter your email address and a password. 

2. After signing up you'll receive a confirmation email. You can only log in
after confirming your subscription.

3.You can reset your password. When you ask for a password reset, you'll receive
a confirmation mail as well.

4. When you are logged in you can see your stats. You can update your data like
weight, height, sex and fitness goals. Depending on what you enter, the application
calculates your body mass index, interprets it for you and tells you how much calories 
and how much protein intake you need per day to achieve your fitness goal.

5. The application offers the user a list of healthy nutrition and diverse fitness
routines the user can easily perform at home.

6. The user can also change his email, password and delete his account.

## External Libraries & Tools used
[Fontawesome](https://fontawesome.com/how-to-use/on-the-web/setup/hosting-font-awesome-yourself)  
[Pikaday – JS Calendar](https://github.com/Pikaday/Pikaday)

## Help list
__Prepared database credentials__  
database name: up_fitness  
username = ueli  
password = G2jmGVPe5Jm3!3SbH*  
---
__Testuser__  
Login Email: admin@sae.edu  
Password: SAEzuerich2019$
----
Sometimes the local server needs to send the user an email, but this mails often time never arrive at their destination, since they get blocked or flagged as spam. Here you can find all the links
you need in order to be able to test the software:

__Registration confirmation link__  
When a user registers, he receives a confirmation email with a confirmation link via email.
This is set up as follows:
```
http://"localhost:[YOUR PORT NUMBER]/upfitness/?page=login&user=[THE EMAIL USED TO REGISTER]&key=[CONFIRMATION CODE]
```
You'll find the [CONFIRMATION CODE] stored in the MySQL Database.

---
When a user resets his password, he receives a confirmation email with a confirmation link via email.
The link is set up as follows:
```
http://"localhost:[YOUR PORT NUMBER]/upfitness/?page=reset&id=[THE EMAIL USED TO RESET]&key=[RESET CODE]&action=reset
```
You'll find the [RESET CODE] stored in the MySQL Database.

## Browser compatibility
The application should work on all modern browsers, such as 
Google Chrome, Microsoft Edge, Mozilla Firefox and Opera.

Internet Explorer was purposely excluded, due to time reasons. Might work on it on following versions. 

## Known issues
__#Issue 1__  
The pikaday JS calendar doesn't really work properly on the Safari browser. If you want to enter a date on safari, you'll need to type the date manually (Format: dd/mm/yy)or click the input field and stay with the mouse down and scroll to the calendar. Ifyou let the mouse key go up before you reach the calendar, the calendar disappears.

__#Issue 2__  
I noticed that sometimes it's not possible to sign-up. I'm not sure yet why this is happening,
but what always helped me, was restarting my local server (I'm using MAMP 5.0.1).  

## License
Up Fitness is an open-source software licensed under SAE INSTITUTE ZÜRICH - 2019 © Calvino Miguel
