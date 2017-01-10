import AppDispatch from '../dispatcher/AppDispatcher';
import RegisterConstants from '../constants/RegisterConstants';
import {EventEmitter} from 'events';

const CHANGE_EVENT = 'change';

let registerUser = (fields) => {
  let userInfo = {
    username: fields.username.value,
    password: fields.password.value,
    email: fields.email.value
  };
  return $.ajax({
    method: 'POST',
    url: '/Auth/register',
    data: userInfo
  });
};

let checkAvailability = (name, value) => {
  console.log(name, value);
  return $.ajax({
    method: 'POST',
    url: '/Auth/register/user',
    data: {name, value}
  })
};

function InputField() {
  return { value: '', isDirty: false, error: '' };
}

class RegisterStore extends EventEmitter {
  constructor() {
    super();
    this.fields = {
      username: new InputField(),
      password: new InputField(),
      repeatPassword: new InputField(),
      email: new InputField()
    };
    AppDispatch.register(this._register);
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

  // Store methods
  getForm() {
    return this.fields;
  }
  allValid() {
    for (let key in this.fields) {
      if(!this.fields[key].isDirty) return false;
      if(this.fields[key].error.length !== 0) return false;
    }
    return true;
  }
  updateField = (fieldName, props) => {
    this.fields[fieldName].value = props.value;
    this.fields[fieldName].isDirty = props.isDirty;
  };

  _register = (action) => {
    switch (action.actionType) {
      case RegisterConstants.SUBMIT:
        registerUser(action.fields).then((data) => {
          this.fields.submissionInfo = (data.error.length > 0) ? 'register fail' : 'success';
          this.emitChange();
        });
        break;
      case RegisterConstants.UPDATE_ERROR:
        this.fields[action.name].error = action.error;
        this.emitChange();
        break;
      case RegisterConstants.CHECK_AVAILABILITY:
        checkAvailability(action.name, action.value).then( data => {
          let name = action.name;
          if (data.available) this.fields[name].error = '';
          if (!data.available) this.fields[name].error = `${name} is already used`;
          this.emitChange();
        });
        break;

      default:
        return false;
    }
  }
}

export default new RegisterStore();