function Widget_initialization(params) {
    let frame = document.createElement('div');
    frame.className = "widget";
    let parameters = '?href=' + encodeURIComponent(document.location.href) + '&';
    for (let im of Object.keys(params)) {
        var itm = params[im];
        if (im == 'id') {
            var wid_id = itm;
        }
        if (im == 'type') {
            var type = itm;
        }
        if (itm.indexOf('#') > -1) {
            itm = itm.replace("#", "");
        }
        if (itm.indexOf('"') > -1)
            itm = encodeURI(itm);
        parameters += im + '=' + itm + '&';
    }
    var request = new XMLHttpRequest();
    request.open('GET', 'https://richlink.ru/include/widget.php' + parameters, true);
    request.onload = function () {
        if (this.status >= 200 && this.status < 400) {
            frame.innerHTML = this.response;
            var scriptElement = frame.querySelector('script');
            if (scriptElement) eval(scriptElement.innerHTML);
        } else {
            console.log('Error!');
        }
    };
    request.onerror = function () {
        console.log('Error connection!');
    };
    request.send();
    let place = document.querySelector('[data-widget-id="' + wid_id + '"]');
    place.append(frame);
}