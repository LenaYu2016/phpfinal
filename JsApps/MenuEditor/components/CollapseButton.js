import React from 'react';

export default class CollapseButton extends React.Component {

  render() {
    const isCollapsed = this.props.isCollapsed;
    const className = !isCollapsed ? 'glyphicon glyphicon-minus' : 'glyphicon glyphicon-plus';
    const msg = !isCollapsed ? 'collapse' : 'expand';

    return(
        <span className={className}
              onClick={this.props.onClick}
              style={{cursor: 'pointer'}}>
          {msg}
        </span>
    )
  }
}