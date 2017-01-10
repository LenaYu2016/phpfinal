import React from 'react';

export default class Toolbar extends React.Component {

  render() {
    return (
        <div className="panel panel-default">
          <div className="panel-body">
            <div className="page-header" id={this.props.editorName}>
              <h1>
                <input type="text"
                       onChange={this.props.onChange}
                       value={this.props.pageName}/>
              </h1>
              <p>Click to edit</p>
            </div>
            <div className="pull-right">
              <button className="btn btn-primary" onClick={this.props.onSave}>Save</button>
              <button className="btn btn-danger" onClick={this.props.onDelete}>Cancel</button>
            </div>
          </div>
        </div>
    )
  }
}