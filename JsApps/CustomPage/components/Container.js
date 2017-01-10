import React from 'react';
import Page from './Page';
import PageList from './PageList';
import PageStore from '../stores/PageStore';
import PageActions from '../actions/PageActions';

const EDITOR_NAME = 'editor';

// todo: find out why it does not update content in state

export default class Container extends React.Component {

  constructor() {
    super();
    this.state = {
      pageList: [{}],
      currentItem: {},
      currentIndex: 0
    }
  }

  componentDidMount() {
    PageStore.addChangeListener(this._onChange);
    PageActions.getList();
  }

  componentDidUpdate() {
    if (this.state.toastr) this.state.toastr();
  }

  componentWillUnmount() {
    PageStore.removeChangeListener(this._onChange);
  }

  _onChange = () => {
    this.setState(PageStore.getState());
  };

  handleSave = () => {
    console.log('saving...');
    this.state.pageList[this.state.currentIndex].content = CKEDITOR.instances[EDITOR_NAME].getData();
    this.setState({pageList: this.state.pageList});
    PageActions.save(this.state.pageList[this.state.currentIndex]);
  };

  handleNewPage = () => {
    PageActions.newPage();
  };

  handlePageChange = (index) => () => {
    PageActions.changePage(this.state.pageList[index].id, index);
  };

  handlePageDelete = () => {
    PageActions.deletePage(this.state.currentItem);
  };

  handlePageNameChange = (event) => {
    this.state.pageList[this.state.currentIndex].name = event.target.value;
    this.state.pageList[this.state.currentIndex].content = CKEDITOR.instances[EDITOR_NAME].getData();
    this.setState({pageList: this.state.pageList});
  };

  render() {
    return (
        <div className="container-fluid">
          <div className="row">
            <div className="col-sm-3">
              <PageList
                  onNewPage={this.handleNewPage}
                  onPageChange={this.handlePageChange}
                  {...this.state}/>
            </div>
            <div className="col-sm-9">
              <Page
                  editorName={EDITOR_NAME}
                  onSave={this.handleSave}
                  onDelete={this.handlePageDelete}
                  onNameChange={this.handlePageNameChange}
                  pageItem={this.state.pageList[this.state.currentIndex]}/>
            </div>
          </div>
        </div>
    )
  }
}