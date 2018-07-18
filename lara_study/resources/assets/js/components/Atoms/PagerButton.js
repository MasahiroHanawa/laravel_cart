import React from 'react';
import PropTypes from 'prop-types';
import {
  Grid,
  Row,
  Col,
  Button,
  FormGroup,
  FormControl,
} from 'react-bootstrap';

export default class PagerButton extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      params: {
        next: 0,
        prev: 0
      }
    };
  }

  onClickPager() {
    debugger
    this.props.home.actions.search(Object.assign({page: this.props.page}, this.props.home.products.params))
  }

  render() {
    console.log(this);
    return(
      <div className={this.props.name} ><a onClick={() => this.onClickPager()}>{this.props.title}</a></div>
    )
  }
}

PagerButton.propTypes = {
  title: PropTypes.string,
  // home: PropTypes.shape({
  //   products: PropTypes.object,
  //   message: PropTypes.string,
  // })
};
