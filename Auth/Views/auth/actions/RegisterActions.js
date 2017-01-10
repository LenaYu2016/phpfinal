import AppDispatcher from '../dispatcher/AppDispatcher';
import RegisterConstants from '../constants/RegisterConstants';

export default {
  updateError: (name, error) => {
    AppDispatcher.dispatch({
      actionType: RegisterConstants.UPDATE_ERROR,
      name,
      error
    });
  },
  registerUser: (fields) => {
    AppDispatcher.dispatch({
      actionType: RegisterConstants.SUBMIT,
      fields
    });
  },
  checkAvailability: (name, value) => {
    AppDispatcher.dispatch({
      actionType: RegisterConstants.CHECK_AVAILABILITY,
      name,
      value
    });
  }
}