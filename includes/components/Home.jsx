import { useEffect, useState } from "react";

const Home = () => {
  const onFormSubmit = (event) => {
    event.preventDefault();

    let formData = new FormData(event.target);
    formData.append("action", "react_form_submit");
    formData.append("nonce", ReacSettings.nonce);
    fetch(ReacSettings.wp_ajax, {
      method: "POST",
      body: formData,
    });
  };

  const [formValue, setFormValue] = useState({});

  useEffect(() => {
    let url = ReacSettings.wp_ajax + "?action=get_from_data&nonce=" + ReacSettings.nonce;

    fetch(url, {
      method: "GET",
    })
      .then((res) =>{
        return res.json();
      }).then((res) => {
        console.log(res.data);
        setFormValue(res.data);
      });
  }, []);

  return (
    <div>
      <div className="wrap">
        <form onSubmit={onFormSubmit}>
          <table className="form-table">
            <tbody>
              <tr>
                <th scope="row">
                  <label>Title</label>
                </th>
                <td>
                  <input type="text" name="title" defaultValue={formValue.title} />
                </td>
              </tr>

              <tr>
                <th scope="row">
                  <label>Choose Option</label>
                </th>
                <td>
                  <select name="choose_option" id="">
                    <option value="">Select</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </td>
              </tr>

              <tr>
                <th scope="row">
                  <label>Radio</label>
                </th>
                <td>
                  <fieldset>
                    <label>
                      <input type="radio" name="select_radio" value="1" />
                      One
                    </label>
                    <br />
                    <label>
                      <input type="radio" name="select_radio" value="2" />
                      Two
                    </label>
                    <br />
                    <label>
                      <input type="radio" name="select_radio" value="3" />
                      Three
                    </label>
                  </fieldset>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  <label>Checkbox</label>
                </th>
                <td>
                  <fieldset>
                    <label>
                      <input
                        type="checkbox"
                        name="select_checkbox[]"
                        value="1"
                      />
                      One
                    </label>
                    <br />
                    <label>
                      <input
                        type="checkbox"
                        name="select_checkbox[]"
                        value="2"
                      />
                      Two
                    </label>
                    <br />
                    <label>
                      <input
                        type="checkbox"
                        name="select_checkbox[]"
                        value="3"
                      />
                      three
                    </label>
                  </fieldset>
                </td>
              </tr>
            </tbody>
          </table>
          <p class="submit">
            <input
              type="submit"
              name="submit"
              id="submit"
              class="button button-primary"
              value="Save Changes"
            />
          </p>
        </form>
      </div>
    </div>
  );
};

export default Home;
