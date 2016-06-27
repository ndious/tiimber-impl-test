var fragments = document.querySelectorAll('tiimber-fragment');
var updateDom = function (fragment) {

}
var sendRequest = function () {
  var xhr = new XMLHttpRequest();
    var params = buildRequestContent(position);
    xhr.onreadystatechange = onreadystatechange.bind(xhr, fulfill, reject);

    xhr.open(config.action, config.url, true);
    xhr.responseType = config.type;
    xhr.setRequestHeader('Accept', config.accept);
    xhr.setRequestHeader('Content-type', 'application/tiimber-fragment');

    xhr.send(params);
};
[].forEach.call(fragments, function (fragment) {
  [].forEach.call(fragment.querySelectorAll('a'), function (link) {
    link.addEventListener('click', function (event) {
      event.preventDefault();
      console.log(fragment.getAttribute('view'), 'click');
    });
  });
  [].forEach.call(fragment.querySelectorAll('form'), function (form) {
    form.addEventListener('click', function (event) {
      event.preventDefault();
      console.log(fragment.getAttribute('view'), 'submit');
    });
  });
});
