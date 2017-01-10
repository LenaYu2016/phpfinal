import AppDispatcher from '../dispatcher/AppDispatcher';
import AppConstants from '../constants/AppConstants';

export default {
  changeView: (viewName) => {
    AppDispatcher.dispatch({
      actionType: AppConstants.CHANGE_VIEW,
      viewName
    })
  },
  getLogin: () => {
    AppDispatcher.dispatch({
      actionType: AppConstants.GET_LOGIN
    })
  },
  logout: () => {
    AppDispatcher.dispatch({
      actionType: AppConstants.LOGOUT
    })
  },
  login: (username, password) => {
    AppDispatcher.dispatch({
      actionType: AppConstants.LOGIN,
      username: username,
      password: password
    })
  },
  adminLogin: (username, password) => {
    AppDispatcher.dispatch({
      actionType: AppConstants.ADMIN_LOGIN,
      username: username,
      password: password
    })
  }

}