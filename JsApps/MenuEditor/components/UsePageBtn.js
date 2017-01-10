import React from 'react';
import _ from 'lodash';

export default class UsePageBtn extends React.Component {
  static propTypes = {
    pageList: React.PropTypes.array.isRequired
  };

  constructor(props) {
    super(props);
    const usePage = 'Custom Page';
    this.state = {
      usePage
    };
  }
  // componentWillReceiveProps(nextProps) {
  //   const link = nextProps.link;
  //   if (/page\/.+/.test(link)) {
  //     const pageId = link.slice(link.lastIndexOf('/') + 1);
  //     const pageItem = _.find(nextProps.pageList, {id: pageId});
  //     this.setState({usePage: pageItem.name});
  //   } else {
  //     this.setState({usePage: 'Custom Page'})
  //   }
  // }

  handlePageChange = (item) => () => {
    this.setState({usePage: item.name});
    this.props.onPageChange(item.id);

  };

  render() {
    if (!this.props.pageList) return;
    const link = this.props.link;
    let usePage = '';
    if (/page\/.+/.test(link) && this.props.pageList) {
      const pageId = link.slice(link.lastIndexOf('/') + 1);
      usePage = _.find(this.props.pageList, {id: pageId});
      usePage = usePage && usePage.name
    }

    return (
        <div className="btn-group">
          <button type="button" className="btn btn-default dropdown-toggle" data-toggle="dropdown">
            {usePage} <span className="caret"></span>
          </button>
          <ul className="dropdown-menu">
            {this.props.pageList.map((item, index) => {
              return (
                  <li key={index} data-pageid={item.id} onClick={this.handlePageChange(item)}><a
                      href="#">{item.name}</a></li>
              )
            })}
          </ul>
        </div>
    )
  }
}