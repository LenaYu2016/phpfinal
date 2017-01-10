import React from 'react';
import RegisterForm from './RegisterForm';
import RegisterStore from '../../stores/RegisterStore';
import RegisterActions from '../../actions/RegisterActions';

export default class RegisterApp extends React.Component {
  constructor() {
    super();
    this.state = RegisterStore.getForm();
  }

  componentDidMount() {
    RegisterStore.addChangeListener(this._onChange);
  }

  componentWillUnmount() {
    RegisterStore.removeChangeListener(this._onChange);
  }

  _onChange = () => {
    this.setState(RegisterStore.getForm());
    this.setState({allValid: RegisterStore.allValid()})
  };

  handleSubmit = (event) => {
    event.preventDefault();
    RegisterActions.registerUser(this.state);
  };

  handleInputChange = (event) => {
    let values = {
      value: event.target.value,
      isDirty: true
    };
    RegisterStore.updateField(event.target.name, values);
    this.setState(RegisterStore.getForm());
  };

  render() {
    return (
        <RegisterForm
            fields={this.state}
            onChange={this.handleInputChange}
            onSubmit={this.handleSubmit}
            onBlur={this.handleBlur}
        />
    )
  }
}