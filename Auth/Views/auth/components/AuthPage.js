import React from 'react';
import { browserHistory, Router, Route, IndexRoute, Link } from 'react-router'
import LoginApp from './login/LoginApp';
import RegisterApp from './register/RegisterApp';
import LoggedIn from './login/LoggedIn';
import AppActions from '../actions/AppActions';
import AppStore from '../stores/AppStore';


export default class AuthPage extends React.Component {
  constructor() {
    super();
    this.state = this.getAppState();
  }

  componentDidMount() {
    AppStore.addChangeListener(this._onChange);
    AppActions.getLogin();
  }

  componentWillUnmount() {
    AppStore.removeChangeListener(this._onChange);
  }

  _onChange = () => {
    this.setState(this.getAppState());
  };

  getAppState = () => {
    return {
      view: AppStore.getCurrentView(),
      loginStatus: AppStore.getLogin()
    }
  };

  render() {
    if (this.state.loginStatus.isLoggedIn) {
      return <LoggedIn
          username={this.state.loginStatus.username}
          onLogout={AppActions.logout}
      />;
    }
    return (
        <div className="container">
          <div className="row" style={{display: 'flex', alignItems: 'center'}}>
            <div style={{borderRight: '1px solid grey', flex: '3'}}>
              <h2 className="text-left">Login</h2>
              <LoginApp
                  error={this.state.loginStatus.error}
                  onSubmit={AppActions.login}
              />
            </div>
            <div style={{flex: '1', padding: '1em'}}>
              <Link to="/Auth/register"><button className="btn btn-default btn-block">Register</button></Link>
            </div>
          </div>
        </div>
    )
  }


}