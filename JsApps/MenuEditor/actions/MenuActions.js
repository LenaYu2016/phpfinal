import AppDispatcher from '../dispatcher/AppDispatcher';
import MenuConstants from '../constants/MenuConstants';
import * as Api from '../api';

export default {
  saveMenu: (menu) => {
    Api.saveMenu(menu).then( response => {
      AppDispatcher.dispatch({
        actionType: MenuConstants.SAVE,
        response
      })
    })
  },
  getMenu: () => {
    Api.getMenu().then( data => {
      AppDispatcher.dispatch({
        actionType: MenuConstants.GET_MENU,
        menu: data
      })
    });
  },
  update: (menu, newMenuItems=null) => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.UPDATE,
      menu, newMenuItems
    })
  },
  deleteMenu: (index) => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.DELETE_MENU,
      index
    })
  },
  switchMenu: (menuNum) => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.SWITCH,
      menuNum
    })
  },
  createMenuItem: () => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.CREATE_ITEM
    })
  },
  createNewMenu: () => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.CREATE_MENU
    })
  },
  createCustomPage: () => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.CREATE_CUSTOM_PAGE
    })
  },
  updateName: (name, num) => {
    AppDispatcher.dispatch({
      actionType: MenuConstants.UPDATE_NAME,
      name, num
    })
  }
}
