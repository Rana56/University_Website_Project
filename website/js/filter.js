//changes schedule from ascending or decending, updates list
function loadFilter(filter) {
    //ajax request
    var req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //updates list
            document.getElementById("eventList").innerHTML = this.responseText;
        }
    };

    //request
    req.open(
        'GET',
        'php/filter.php?q='+filter,
        true
    );
    req.send();
}