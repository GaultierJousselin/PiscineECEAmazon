function sendPostRequest(path, params) {
    var xmlHttpReq = false;

    // Mozilla/Safari
    if (window.XMLHttpRequest) {
        this.xmlHttpReq = new XMLHttpRequest();
    }
    // IE
    else if (window.ActiveXObject) {
        this.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
    }

    this.xmlHttpReq.open("POST", path, true);
    this.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    // this.xmlHttpReq.setRequestHeader("Content-length", QueryString.length);
    this.xmlHttpReq.send(params);
}
