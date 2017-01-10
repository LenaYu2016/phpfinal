import AppDispatcher from '../dispatcher/AppDispatcher';
import PageConstant from '../constants/PageConstants';
import * as Api from '../api';

export default {
  getList: () => {
    Api.getPageList().then(response => {
      AppDispatcher.dispatch({
        actionType: PageConstant.GET_LIST,
        pageList: response
      })
    })
  }
}