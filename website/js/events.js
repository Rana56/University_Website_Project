//books the user to event
function book(eventid){
    //ajax request
    var req = new XMLHttpRequest();

    //books and unbooks user if already booked
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //updates list
            if (this.responseText == "false"){
                //redirects user if not logged in
                window.location.href = "login.php";
            } else {
                document.getElementById('bookbtnid' + eventid).innerHTML = this.responseText;
            }
        }
    };

    //request
    req.open(
        'GET',
        'php/book.php?q=' + eventid,
        true
    );
    req.send();
}

//updates the like value
function goLike(eventid){
    //ajax request
    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //updates like
            document.getElementById('likeid'+ eventid).innerHTML = this.responseText;
        }
    };

    //request
    req.open(
        'GET',
        'php/like.php?q='+eventid,
        true
    );
    req.send();
}

//when page loads checks if user already is booked, if so, it changes the book btn text to 'booked'
window.onload = function() {
    //gets the buttons
    var btn = document.getElementsByClassName("bookbtn");
    console.log(btn.length);
    var i;
    for(i = 1; i <= btn.length; i ++){
        update(i);
        console.log(i);
    }
}

//updates the buttons
function update(eventid){
    var req = new XMLHttpRequest();
        
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            if (this.responseText != "false"){
                //var id = i;
                console.log(this.responseText);
                //console.log(eventid);
                document.getElementById('bookbtnid' + eventid).innerHTML = this.responseText;
                //btn[i].innerHTML = this.responseText;

            }
        }
    };

    //request
    req.open(
        'GET',
        'php/bookcheck.php?q=' + eventid,
        true
    );
    req.send();
}