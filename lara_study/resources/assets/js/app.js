import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import Home from './components/Pages/Home';
import createHistory from 'history/createBrowserHistory'
import RegisterProduct from './components/RegisterProduct';
import finalCreateStore from './stores/store';
import { Route } from 'react-router';
import { ConnectedRouter } from 'react-router-redux';

const store = finalCreateStore();
const history = createHistory();

ReactDOM.render(
  <Provider store={store}>
    <ConnectedRouter history={history}>
      <div>
        <Route path="/" component={Home}/>
        <Route path="/register/product" component={RegisterProduct}/>
      </div>
    </ConnectedRouter>
  </Provider>,
  document.getElementById('app')
);
