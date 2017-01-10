import React from 'react';

export default class PageList extends React.Component {
  static propTypes = {
    pageList: React.PropTypes.array.isRequired
  };

  render() {
    if (this.props.pageList.length < 1) return <div></div>;
    return (
        <div>
          <button className="btn btn-success" onClick={this.props.onNewPage}>new page</button>
          <ul>
            {this.props.pageList.map( (item, index) => {
              return (
                  <li key={index} style={{cursor: 'pointer'}}
                      onClick={this.props.onPageChange(index)}>{item.name}</li>
              )
            })}
          </ul>
        </div>
    )
  }
}