import AppDispatcher from '../dispatcher/AppDispatcher';
import {EventEmitter} from 'events';
import AppConstant from '../constants/AppConstants';


const CHANGE_EVENT = 'change';


let submitLogin = (username, password) => {
  return $.ajax({
    url: '/Auth/login',
    method: 'POST',
    data: {username, password}
  });
};
let adminLogin = (username, password) => {
  return $.ajax({
    url: '/Auth/admin',
    method: 'POST',
    data: {username, password}
  });
};

class AppStore extends EventEmitter {
  _currentView;
  _isLoggedIn;
  _loginError;
  _username;

  constructor() {
    super();
    AppDispatcher.register(this._register);
  }

  emitChange() {
    this.emit(CHANGE_EVENT)
  }

  addChangeListener(callback) {
    this.on(CHANGE_EVENT, callback)
  }

  removeChangeListener(callback) {
    this.removeListener(CHANGE_EVENT, callback)
  }

  getCurrentView() {
    return this._currentView;
  }

  getLogin() {
    return {
      isLoggedIn: this._isLoggedIn,
      username: this._username,
      error: this._loginError
    };
  }

  _register = (action) => {
    switch (action.actionType) {
      case AppConstant.CHANGE_VIEW:
        this._currentView = action.viewName;
        this.emitChange();
        break;
      case AppConstant.GET_LOGIN:
        $.get('/Auth/getLogin').then(data=> {
          if (data.success) {
            this._isLoggedIn = true;
            this._username = data.username;
          }
          this.emitChange();
        });
        break;
      case AppConstant.LOGOUT:
        $.get('/Auth/logout').then(data=> {
          console.log(data);
          if (data.success) {
            this._isLoggedIn = false;
            this._username = '';
            this.emitChange();
            // window.location.href = '/';
          }
        });
        break;
      case AppConstant.LOGIN:
        console.log('logging in');
        submitLogin(action.username, action.password).then(data => {
          this._username = action.username;
          this._loginError = data.error[0];
          this._isLoggedIn = data.success;
          this.emitChange();
        });
        break;
      case AppConstant.ADMIN_LOGIN:
        console.log('admin logging in');
        adminLogin(action.username, action.password).then(data => {
          if (data.success) window.location.replace('/Admin/home');
          this._isLoggedIn = data.success;
          this._loginError = data.error[0];
          this.emitChange();
        })
    }
  }
}

export default new AppStore();
