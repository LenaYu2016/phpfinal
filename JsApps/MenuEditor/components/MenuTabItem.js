import React from 'react';

export default class MenuTabItem extends React.Component {

  static propTypes = {
    name: React.PropTypes.string.isRequired,
    index: React.PropTypes.number.isRequired,
    disabled: React.PropTypes.string.isRequired,
    onClick: React.PropTypes.func.isRequired,
    onDoubleClick: React.PropTypes.func.isRequired,
    onBlur: React.PropTypes.func.isRequired,
    onMenuChange: React.PropTypes.func.isRequired,
    onNameChange: React.PropTypes.func.isRequired,
    onDelete: React.PropTypes.func.isRequired
  };
  render() {
    return (
        <li role="presentation" className='list-group-item'>
          <div className="row">
            <div className="col-xs-8">
              <input type="text" value={this.props.name}
                     className="form-control"
                     disabled={this.props.disabled}
                     onClick={this.props.onMenuChange}
                     onDoubleClick={this.props.onDoubleClick}
                     onBlur={this.props.onBlur}
                     onChange={this.props.onNameChange}/>
            </div>
            <div className="col-xs-4">
              <button className="btn btn-danger" type="button" onClick={this.props.onDelete}>Delete</button>
            </div>
          </div>
        </li>
    );
  }
}