import React from 'react';
import ReactDOM from 'react-dom';
import AuthApp from './components/AuthApp';
import '../../../Assets/css/font-awesome.min.css!';
import '../../../Assets/css/bootstrap-social.css!';

ReactDOM.render(<AuthApp />, document.querySelector('#login'));

(function () {
  window.login.show = () => $('#loginBtn').click();
  window.login.hide = () => $('#authModal').modal('hide');
})();