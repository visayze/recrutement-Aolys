import { ProjetTestPage } from './app.po';

describe('projet-test App', () => {
  let page: ProjetTestPage;

  beforeEach(() => {
    page = new ProjetTestPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
