import React from 'react';
import Editor from './Editor';
import Toolbar from './Toolbar';

export default class Page extends React.Component {

  render() {
    return (
        <div>
          <Toolbar
              pageName={this.props.pageItem.name}
              onChange={this.props.onNameChange}
              onDelete={this.props.onDelete}
              onSave={this.props.onSave}/>
          <Editor name={this.props.editorName} content={this.props.pageItem.content}/>
        </div>
    )
  }
}