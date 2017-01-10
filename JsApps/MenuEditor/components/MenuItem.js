import React from 'react';
import UsePageBtn from './UsePageBtn';

export default class MenuItem extends React.Component {
  static defaultProps = {
    collapseButton: ""
  };

  static propTypes = {
    nameValueLink: React.PropTypes.object.isRequired,
    linkValueLink: React.PropTypes.object.isRequired,
    pageList: React.PropTypes.array,
    onChange: React.PropTypes.func.isRequired,
    onDelete: React.PropTypes.func.isRequired,
    collapseButton: React.PropTypes.node
  };

  shouldComponentUpdate(nextProps) {
    return nextProps.name !== this.props.name
        || nextProps.link !== this.props.link
        || nextProps.collapseButton !== this.props.collapseButton
        || nextProps.pageList !== this.props.pageList
  }

  render() {
    return (
        <div className="panel panel-default" style={{marginBottom: '0px', cursor: 'move'}}>
          {this.props.collapseButton}
          <div className="panel-body" style={{padding: '2px'}}>
            <div className="row">
              <div className="col-xs-5">
                <div className="input-group">
                  <span className="input-group-addon">Name</span>
                  <input type="text" name='name'
                         className="form-control" placeholder="name"
                         value={this.props.nameValueLink.value}
                         onChange={this.props.nameValueLink.onChange}/>
                </div>
              </div>

              <div className="col-xs-5">
                <div className="input-group">
                  <span className="input-group-addon">Link</span>
                  <input type="text" name='link'
                         className="form-control" placeholder="link"
                         value={this.props.linkValueLink.value}
                         onChange={this.props.linkValueLink.onChange}/>
                </div>
              </div>

              <div className="col-xs-2">
                <UsePageBtn 
                    link={this.props.link}
                    pageList={this.props.pageList}
                    onPageChange={this.props.customPageChange} />
                <button className="btn btn-danger" onClick={this.props.onDelete}>Delete</button>
              </div>
            </div>
          </div>
        </div>
    );
  }
}