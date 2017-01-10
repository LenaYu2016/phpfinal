import React from 'react';
import ReactDOM from 'react-dom';
import {browserHistory, Router, Route, IndexRoute, Link} from 'react-router'
import AuthPage from './components/AuthPage';
import Register from './components/register/RegisterApp';
import '../../../Assets/css/font-awesome.min.css!';
import '../../../Assets/css/bootstrap-social.css!';

class App extends React.Component {
  render() {
    return <div>{this.props.children}</div>
  }
}

ReactDOM.render((
    <Router history={browserHistory}>
      <Route path="/Auth" component={App}>
        <IndexRoute component={AuthPage} />
        <Route path="login" component={AuthPage}/>
        <Route path="register" component={Register}/>
      </Route>
    </Router>
), document.querySelector('#login'));