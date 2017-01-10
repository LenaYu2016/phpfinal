import AppDispatcher from '../dispatcher/AppDispatcher';
import EventEmitter from 'events';
import MenuConstants from '../constants/MenuConstants';
// import toastr from 'toastr';
// import 'toastr/build/toastr.min.css!';

const CHANGE_EVENT = 'change';


class MenuStore extends EventEmitter {
  _state = {
    menu: [],
    num: 0,
    toastr: false
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

  getState() {
    return this._state;
  }

  ///////////

  _register = (action) => {
    switch (action.actionType) {
      case MenuConstants.GET_MENU:
        this._state.menu = action.menu.map(m => ({name: m.name, menu: JSON.parse(m.menu)}));
        this.emitChange();
        break;
      case MenuConstants.SAVE:
        console.log('save response', action.response);
        if (action.response.success) {
          this._state.toastr = () => toastr.success('Menu Saved');
        } else {
          this._state.toastr = () => toastr.error('Failed to save');
        }
        this.emitChange();
        this._state.toastr = false;
        this.emitChange();
        break;
      case MenuConstants.UPDATE:
        if (action.menu) this._state.menu[this._state.num].menu = action.menu;
        if (action.newMenuItems) this._state.newItems = action.newMenuItems;
        this.emitChange();
        break;
      case MenuConstants.UPDATE_NAME:
        this._state.menu[action.num].name = action.name;
        this.emitChange();
        break;
      case MenuConstants.SWITCH:
        this._state.num = action.menuNum;
        this.emitChange();
        break;
      case MenuConstants.CREATE_ITEM:
        this._state.menu[this._state.num].menu.unshift({name: '', link: ''});
        this.emitChange();
        break;
      case MenuConstants.CREATE_MENU:
        this._state.menu.push({menu: [], name: 'new'});
        this.emitChange();
        break;
      case MenuConstants.DELETE_MENU:
        this._state.menu.splice(action.index, 1);
        this._state.num = 0;
        this.emitChange();
        break;
      case MenuConstants.CREATE_CUSTOM_PAGE:
        this._state.menu[this._state.num].menu.unshift({name: '', link: '', pageId: ''});
        this.emitChange();
    }
  }
}

export default new MenuStore();