import AppDispatcher from '../dispatcher/AppDispatcher';
import EventEmitter from 'events';
import PageConstants from '../constants/PageConstants';
const CHANGE_EVENT = 'change';

class PageStore extends EventEmitter {
  _state = {
    pageList: []
  };

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

  getState = () => this._state.pageList;

  _register = (action) => {
    switch (action.actionType) {
      case PageConstants.GET_LIST:
        console.log(action.pageList);
        this._state.pageList = action.pageList;
        this.emitChange();
        break;
    }
  }
}

export default new PageStore();