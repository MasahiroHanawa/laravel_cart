import React from 'react';
import * as actions from '../../actions/product';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import Product from '../Organisms/Product';
import { bindActionCreators } from 'redux';
import queryString from 'query-string';
import {
  Grid,
  Row,
  Col,
  Button,
  FormGroup,
  FormControl,
} from 'react-bootstrap';

export class Home extends React.Component {
  constructor(props) {
    super(props);
    this.handleSearchSubmit = this.handleSearchSubmit.bind(this);
  }

  handleChange (name, e) {
    this.props.actions.setParam('name', e.target.value);
  }

  handleSearchSubmit (e) {
    e.preventDefault();
    this.props.actions.search(this.props.products.params);
    this.props.history.push({
      pathname: this.props.location.pathname,
      search: queryString.stringify(this.props.products.params)
    });
  }

  componentWillMount() {
    this.props.actions.search(this.props.products.params);
  }
  
  componentDidMount() {
    this.props.actions.search(this.props.products.params);
  }

  render() {
    return(
      <div>
        <Grid>
          <form onSubmit={this.handleSearchSubmit}>
            <FormGroup>
              <Row>
                <Col xs={12} md={6}>
                  <div className="item">
                    <FormControl
                      type="text"
                      value={this.props.products.params.keyword}
                      placeholder="You can search Product"
                      onChange={(e) => this.handleChange('keyword', e)}
                    />
                  </div>
                </Col>
                <Col xs={12} md={6}>
                  <div className="item">
                    <Button type="submit" className="btn-primary" title="search">Search</Button>
                  </div>
                </Col>
              </Row>
            </FormGroup>
          </form>
          <Product home={this.props}/>
        </Grid>
      </div>
    )
  }
}

Home.propTypes = {
  actions: PropTypes.shape({
    inputKeyword: PropTypes.func.isRequired,
    search: PropTypes.func.isRequired
  }),
  products: PropTypes.shape({
    params: PropTypes.shape({
      keyword: PropTypes.string,
      categoryId: PropTypes.integer,
    }),
    products: PropTypes.object,
    message: PropTypes.string,
  })
};

const mapStateToProps = (state) => {
  const stateToProps = {
    products: {
      ...state.product
    }
  };
  return stateToProps;
};

const mapDispatchProps = (dispatch) => {
  const dispatchProps = {
    actions: bindActionCreators({
      ...actions,
    }, dispatch)
  };
  return dispatchProps;
};

export default connect(mapStateToProps, mapDispatchProps)(Home)
