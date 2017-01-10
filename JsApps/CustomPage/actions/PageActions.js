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
  },
  changePage: (id, index) => {
    Api.get(id).then( response => {
      AppDispatcher.dispatch({
        actionType: PageConstant.CHANGE_PAGE,
        response, index
      })
    })
  },
  save: (item) => {
    Api.update(item).then(response => {
      AppDispatcher.dispatch({
        actionType: PageConstant.SAVE,
        response, content: item.content
      })
    })
  },
  newPage: (content = '') => {
    Api.add(content).then(response => {
      AppDispatcher.dispatch({
        actionType: PageConstant.NEW_PAGE,
        response
      })
    })
  },
  deletePage: (item) => {
    Api.deletePage(item.id).then( response => {
      AppDispatcher.dispatch({
        actionType: PageConstant.DELETE_PAGE,
        response
      })
    })
  }
}