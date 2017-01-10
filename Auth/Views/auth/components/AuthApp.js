import React from 'react';
import LoginApp from './login/LoginApp';
import RegisterApp from './register/RegisterApp';
import LoggedIn from './login/LoggedIn';
import AppActions from '../actions/AppActions';
import AppStore from '../stores/AppStore';

export default class AuthApp extends React.Component {
  currentView;
  showComponent = true;

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
    console.log('auth change');

  };

  getAppState = () => {
    return {
      view: AppStore.getCurrentView(),
      loginStatus: AppStore.getLogin()
    }
  };

  handleViewChange = (event) => {
    let name = event.target.name;
    AppActions.changeView(name);
    if (name === this.state.view) {
      this.showComponent = !this.showComponent;
    } else {
      this.showComponent = true;
    }
  };

  _assignComponent = (name) => {
    switch (name) {
      case 'login':
        return <LoginApp
            error={this.state.loginStatus.error}
            onSubmit={AppActions.login}
        />;
      case 'register':
        return <RegisterApp />;
    }
  };

  render() {
    // Show logged in page
    if (this.state.loginStatus.isLoggedIn) {
      $('#authModal').modal('hide');
      return <LoggedIn
          username={this.state.loginStatus.username}
          onLogout={AppActions.logout}
      />;
    }
    // Sets up view to display
    this.currentView = this._assignComponent(this.state.view);
    return (
        <div>
          <button name="login"
                  id="loginBtn"
                  className="btn btn-default"
                  data-toggle="modal" data-target="#authModal"
                  onClick={this.handleViewChange}>Login
          </button>
          <button name="register"
                  className="btn btn-default"
                  data-toggle="modal" data-target="#authModal"
                  onClick={this.handleViewChange}>Register
          </button>

          <div className="modal fade" id="authModal" tabIndex="-1" role="dialog">
            <div className="modal-dialog modal-lg" role="document">
              <div className="modal-content">

                <div className="modal-header">
                  <button type="button" className="close" data-dismiss="modal">&times;</button>
                  <h4 className="modal-title" id="authModalLabel">{this.state.view}</h4>
                </div>

                <div className="modal-body">
                  {this.currentView}
                </div>

                <div className="modal-footer" style={{border: 'none'}}></div>
              </div>
            </div>
          </div>

        </div>

    )
  }
}