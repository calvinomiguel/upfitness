const logOutBtn = document.getElementsByClassName('log-out');
function logout(){
    console.log('Log out');
    document.location = 'includes/logout.php';
}
for(let i = 0; i < logOutBtn.length; i++){
    logOutBtn[i].addEventListener('click', logout,false);
}