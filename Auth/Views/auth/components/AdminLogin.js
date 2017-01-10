import React from 'react';
import { browserHistory, Router, Route, IndexRoute, Link } from 'react-router'
import LoginApp from './login/LoginApp';
import LoggedIn from './login/LoggedIn';
import AppActions from '../actions/AppActions';
import AppStore from '../stores/AppStore';


export default class AdminLogin extends React.Component {
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
      loginStatus: false
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
                  onSubmit={AppActions.adminLogin}
              />
            </div>
          </div>
        </div>
    )
  }


}