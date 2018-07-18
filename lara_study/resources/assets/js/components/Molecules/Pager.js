import React from 'react';
import PropTypes from 'prop-types';
import PagerButton from '../Atoms/PagerButton';
import {
  Grid,
  Row,
  Col,
  Button,
  FormGroup,
  FormControl,
} from 'react-bootstrap';

export default class Pager extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      params: {
        next: 0,
        prev: 0
      }
    };
  }

  componentDidMount() {

  }

  render() {
    return(<Col xs={12} md={12}>
      <div className="pager">
        {(() => {
          if (this.props.home.products.products.from > 1) {
            return(<PagerButton title="Prev" page={this.props.home.products.products.from - 1} home={this.props.home} />);
          }
        })()}
        {(() => {
          if (this.props.home.products.products.from < this.props.home.products.products.last_page) {
            return(<PagerButton title="Next" page={this.props.home.products.products.from + 1} home={this.props.home} />);
          }
        })()}
      </div>
    </Col>)
  }
}

Pager.propTypes = {
  products: PropTypes.shape({
    products: PropTypes.object,
    message: PropTypes.string,
  })
};
