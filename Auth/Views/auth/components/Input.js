import React from 'react';

export default class Input extends React.Component {

  render() {
    let errorClass = "form-group";
    if (this.props.error) errorClass += ' has-error';
    return(
      <div className={errorClass}>
        <label htmlFor={this.props.name}
               className="col-sm-2 control-label">{this.props.label}</label>
        <div className="col-sm-10">
          <input type={this.props.type}
                 name={this.props.name}
                 id={this.props.name}
                 className="form-control"
                 placeholder={this.props.placeholder}
                 value={this.props.value}
                 onBlur={this.props.onBlur}
                 onChange={this.props.onChange} />
          <p style={{color: 'red'}}>{this.props.error}</p>
        </div>
      </div>
    );
  }
}

Input.propTypes = {
  name: React.PropTypes.string.isRequired,
  label: React.PropTypes.string.isRequired,
  onChange: React.PropTypes.func,
  value: React.PropTypes.string,
  type: React.PropTypes.string,
  placeHolder: React.PropTypes.string,
  error: React.PropTypes.string
};
Input.defaultProps ={
  type: 'text'
};

