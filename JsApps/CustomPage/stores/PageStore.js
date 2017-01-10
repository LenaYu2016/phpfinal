import AppDispatcher from '../dispatcher/AppDispatcher';
import EventEmitter from 'events';
import PageConstants from '../constants/PageConstants';
// import toastr from 'toastr';
// import 'toastr/build/toastr.min.css!';

const CHANGE_EVENT = 'change';

class PageStore extends EventEmitter {
  _state = {
    pageList: [],
    currentItem: {},
    currentIndex: 0
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

  getList = () => this._state.pageList;
  getState = () => this._state;

  _register = (action) => {
    switch (action.actionType) {
      case PageConstants.DELETE_PAGE:
        if (action.response.success) {
          this._state.toastr = () => toastr.success('Page Deleted');
          this._state.pageList = this._state.pageList.filter(item => item.id !== this._state.currentItem.id);
          this._state.currentItem.content = 'Choose a page';
          this.emitChange();
        } else {
          this._state.toastr = () => toastr.warning('Failed to delete');
        }
        break;
      case PageConstants.GET_LIST:
        this._state.pageList = action.pageList;
        this.emitChange();
        break;
      case PageConstants.CHANGE_PAGE:
        this._state.currentItem = action.response;
        this._state.currentIndex = action.index;
        this.emitChange();
        break;
      case PageConstants.NEW_PAGE:
        console.log(action.response);
        this._state.pageList = [...this._state.pageList, {name: 'new', id: action.response.id}];
        this.emitChange();
        break;
      case PageConstants.SAVE:
        this._state.pageList[this._state.currentIndex].content = action.content;
        if (action.response.success) {
          this._state.toastr = () => toastr.success('Page Saved');
        } else {
          this._state.toastr = () => toastr.warning('Failed to save');
        }
        this.emitChange();
        break;
    }

    if (this._state.toastr) {
      this._state.toastr = null;
      this.emitChange();
    }
  }
}

export default new PageStore();